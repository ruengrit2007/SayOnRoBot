  <?php
// Create a client instance
  client = new Paho.MQTT.Client("m15.cloudmqtt.com", 32749,"myweb"); 
  //Example client = new Paho.MQTT.Client("m11.cloudmqtt.com", 32903, "web_" + parseInt(Math.random() * 100, 10));
  // set callback handlers
  client.onConnectionLost = onConnectionLost;
  client.onMessageArrived = onMessageArrived;
  var options = {
    useSSL: true,
    userName: "nmzzzonf",
    password: "2AatIYrDE5KA",
    onSuccess:onConnect,
    onFailure:doFail
  }
  // connect the client
  client.connect(options);
  // called when the client connects
  function onConnect() {
    // Once a connection has been made, make a subscription and send a message.
    console.log("onConnect");
    client.subscribe("/SayOn");
    message = new Paho.MQTT.Message("off");
    message.destinationName = "/SayOn";
    client.send(message); 
	// alert("Connect OK");
  }
  function doFail(e){
    console.log(e);
	alert("Error");
  }
  // called when the client loses its connection
  function onConnectionLost(responseObject) {
    if (responseObject.errorCode !== 0) {
      console.log("onConnectionLost:"+responseObject.errorMessage);
    }
  }
  // called when a message arrives
  function onMessageArrived(message) {
    console.log("onMessageArrived:"+message.payloadString);
  }
?>
