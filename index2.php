{
  "to": "U3c28a70ed7c5e7ce2c9a7597...",
  "messages": [
    {
      "type": "text",
      "text": "Hello Quick Reply!",
      "quickReply": {
        "items": [
          {
            "type": "action",
            "action": {
              "type": "cameraRoll",
              "label": "Camera Roll"
            }
          },
          {
            "type": "action",
            "action": {
              "type": "camera",
              "label": "Camera"
            }
          },
          {
            "type": "action",
            "action": {
              "type": "location",
              "label": "Location"
            }
          },
          {
            "type": "action",
            "imageUrl": "https://cdn1.iconfinder.com/data/icons/mix-color-3/502/Untitled-1-512.png",
            "action": {
              "type": "message",
              "label": "Message",
              "text": "Hello World!"
            }
            },
          {
            "type": "action",
            "action": {
              "type": "postback",
              "label": "Postback",
              "data": "action=buy&itemid=123",
              "displayText": "Buy"
            }
            },
          {
            "type": "action",
            "imageUrl": "https://icla.org/wp-content/uploads/2018/02/blue-calendar-icon.png",
            "action": {
              "type": "datetimepicker",
              "label": "Datetime Picker",
              "data": "storeId=12345",
              "mode": "datetime",
              "initial": "2018-08-10t00:00",
              "max": "2018-12-31t23:59",
              "min": "2018-08-01t00:00"
            }
          }
        ]
      }
    }
   ]
}
