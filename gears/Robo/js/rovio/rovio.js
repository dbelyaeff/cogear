
brightness_slider = new Control.Slider('brightness_handle','brightness_track',{ range:$R(1,6), onChange: changeCamBrightness });
svol_slider = new Control.Slider('svol_handle','svol_track',{ range:$R(0,31), onChange: changeSpeakerVol});
mvol_slider = new Control.Slider('mvol_handle','mvol_track',{ range:$R(0,31), onChange: changeMicVol});
createXMLRequestObjs();
// upnp settings need to be called as soon as possible for RTSP feeds
loadUPnPFields();
// need to know web port for active-x
loadWebPort();
// need to know the manual external ip
getAllParameters();
