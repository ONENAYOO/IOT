<script src="https://netpie.io/microgear.js"></script>

<style>
body {
	text-align: center;
}
/* SWITCH */
.cube-switch {
    border-radius:10px;
    border:1px solid rgba(0,0,0,0.4);
    box-shadow: 0 0 8px rgba(0,0,0,0.6), inset 0 100px 50px rgba(255,255,255,0.1);
    /* Prevents clics on the back */
    cursor:default;    
    display: none;
    height: 75px;
    position: relative;
    overflow:hidden;
    /* Prevents clics on the back */
    pointer-events:none;
    width: 75px;
    white-space: nowrap;
    background:#333;
	margin: 15px;
}
/* The switch */
.cube-switch .switch {
    border:1px solid rgba(0,0,0,0.6);
    border-radius:0.7em;
    box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.3),
    inset 0 -7px 0 rgba(0,0,0,0.2),
    inset 0 50px 10px rgba(0,0,0,0.2),
    0 1px 0 rgba(255,255,255,0.2);
    display:block;
    width: 60px;
    height: 60px;
    margin-left:-30px;
    margin-top:-30px;
    position:absolute;
    top: 50%;
    left: 50%;
    width: 60px;
 
    background:#666;
    transition: all 0.2s ease-out;
    /* Allows click */
    cursor:pointer;
    pointer-events:auto;
}
/* SWITCH Active State */
.cube-switch.active {
    /*background:#222;
    box-shadow:
    0 0 5px rgba(0,0,0,0.5),
    inset 0 50px 50px rgba(55,55,55,0.1);*/
}
.cube-switch.active .switch {
    background:#333;
    box-shadow:
    inset 0 6px 0 rgba(255,255,255,0.1),
    inset 0 7px 0 rgba(0,0,0,0.2),
    inset 0 -50px 10px rgba(0,0,0,0.1),
    0 1px 0 rgba(205,205,205,0.1);
}
.cube-switch.active:after,
.cube-switch.active:before {
    background:#333; 
    box-shadow:
    0 1px 0 rgba(255,255,255,0.1),
    inset 1px 2px 1px rgba(0,0,0,0.5),
    inset 3px 6px 2px rgba(200,200,200,0.1),
    inset -1px -2px 1px rgba(0,0,0,0.3);
}
.cube-switch.active .switch:after,
.cube-switch.active .switch:before {
    background:#222;
    border:none;
    margin-top:0;
    height:1px;
}
.cube-switch .switch-state {
    display: block;
    position: absolute;
    left: 40%;
    color: #FFF;
    font-size: .5em;
    text-align: center;
}
/* SWITCH On State */
.cube-switch .switch-state.on {
    bottom: 15%;
}
/* SWITCH Off State */
.cube-switch .switch-state.off {
    top: 15%;
}
</style>

<script>
	const APPKEY = "rd0xdfHaxoTOFTn";
	const APPSECRET = "SyigaZHzxEa16H9EiWEI4VS82";
	const APPID =  "Testwittawat";
	var microgear = Microgear.create({
		gearkey: APPKEY,
		gearsecret: APPSECRET
	});
	function switchPress(){
		if(document.getElementById("cube-switch").className == "cube-switch active"){
			microgear.chat("pieplug","OFF");
		}else if(document.getElementById("cube-switch").className == "cube-switch"){
			microgear.chat("pieplug","ON");
		}
	}
	microgear.on('message', function(topic,data) {
		if(data=="ON"){
			document.getElementById("cube-switch").className = "cube-switch active";
		}else if(data=="OFF"){
			document.getElementById("cube-switch").className = "cube-switch";
		}
	});
	microgear.on('connected', function() {
		microgear.setname('controllerplug');
		document.getElementById("cube-switch").className = "cube-switch active";
		document.getElementById("cube-switch").style.display = "block";
	});
	microgear.resettoken();
	microgear.connect(APPID);
	
</script>
<div style="margin: 20px;"><img src="img/tesr_logo.png" style="vertical-align:bottom;width:300px;hight:70px;"></div>
<center>
	<div href="" class="cube-switch" id="cube-switch" onclick="switchPress()">
		<span class="switch">
			<span class="switch-state off">Off</span>
			<span class="switch-state on">On</span>
		</span>
	</div>
</center>
</div>