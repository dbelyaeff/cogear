<?php

/**
 * Pages gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Pages
 * @version		$Id$
 */
class Pages_Gear extends Gear {

    protected $name = 'Pages';
    protected $description = 'Manage pages.';
    protected $pages = array();
    protected $type = Gear::CORE;
    protected $package = 'Pages';
    protected $order = 0;
    const DEFAULT_PAGE_URL = 'page/<id>';

    /**
     * Init
     */
    public function init() {
        parent::init();
        $cogear = getInstance();
        $cogear->router->addRoute(':index', array($this, 'index'), TRUE);
        $url = config('pages.url', Pages_Gear::DEFAULT_PAGE_URL);
        $cogear->router->addRoute(str_replace(array(
                    '.',
                    '<id>',
                    '<url>',
                        ), array(
                    '\.',
                    '(?P<id>\d+)',
                    '.+'
                        ), $url), array($this, 'catchPage'), TRUE);
        hook('menu.user_cp', array($this, 'userPanelExtend'));
    }

    /**
     * Show pages
     * 
     * @param string $type 
     */
    public function index($action = '', $subaction = NULL) {
        $cogear = getInstance();
        switch ($action) {
            case 'create':
                if (!page_access('pages create'))
                    return;
                append('content', HTML::paired_tag('h1', t('New page', 'Pages')));
                $form = new Form('Pages.createdit');
                if ($result = $form->result()) {
                    $page = new Pages_Page();
                    $page->object($result);
                    $page->aid = cogear()->user->id;
                    $page->created_date = time();
                    $page->last_update = time();
                    $page->save();
                    flash_success(t('New page has been successfully added!', 'Pages'));
                    redirect($page->getUrl());
                }
                append('content', $form->render());
                break;
            case 'show':
                $this->showPage($subaction);
                break;
            case 'edit':
                $page = new Pages_Page();
                $page->where('id', intval($subaction));
                if ($page->find()) {
                    if (access('pages edit_all') OR $cogear->user->id == $page->aid) {
                        $form = new Form('Pages.createdit');
                        $form->init();
                        if(access('pages delete')){
                            $form->addElement('delete',array('label'=>t('Delete'),'type'=>'submit'));
                        }
                        $form->setValues($page->object());
                        if ($result = $form->result()) {
                            if($result->delete){
                                $page->delete();
                                redirect(Url::link());
                            }
                            $page->object()->mix($result);
                            $page->last_update = time();
                            $page->update();
                            flash_success(t('Page has been update.', 'Pages'));
                            redirect($page->getUrl());
                        }
                        $form->elements->submit->setValue(t('Update'));
                        append('content', $form->render());
                    } else {
                        return _403();
                    }
                } else {
                    return _404();
                }
                break;
            default:
                $this->showPages($action);
        }
    }

    /**
     * Show pages
     * 
     * @param int $page 
     */
    public function showPages($page) {
        $cogear = getInstance();
        //$pager = new Pages_Pager();
        //$pager->page = $page;
        $cogear->db->order('id', 'DESC');
        if ($pages = $cogear->db->get('pages')->result()) {
            foreach ($pages as $data) {
                $page = new Pages_Page();
                $page->object($data);
                $this->renderPage($page);
            }
        }
    }

    /**
     * Catch page from specific route and render it
     */
    public function catchPage() {
        $cogear = getInstance();
        $matches = $cogear->router->getMatches();
        $this->showPage($matches['id']);
    }

    /**
     * Show page
     * 
     * @param   int $id
     * @param   boolean $teaser
     */
    public function showPage($id, $teaser = FALSE) {
        $page = new Pages_Page();
        $page->where('id', $id);
        if ($page->find()) {
            event('Pages.showPage.before', $page);
            $page->teaser = $teaser;
            $this->renderPage($page);
            event('Pages.showPage.after', $page);
        } else {
            return _404();
        }
    }

    /**
     * Render page
     * 
     * @param   object  $page
     */
    public function renderPage($page) {
        $tpl = new Template('Pages.page');
        $tpl->page = $page;
        append('content', $tpl->render());
    }

    /**
     * Add "create page" link into header
     * 
     * @param object $cp 
     */
    public function userPanelExtend($cp) {
        $cogear = getInstance();
        if ($cogear->user->id) {
            $cp->{Url::gear('pages') . 'create'} = icon('page_edit','famfamfam').' '.t('Create page', 'Pages');
        }
    }

}