"use strict";

const functions = require("firebase-functions");
const {WebhookClient, Payload} = require("dialogflow-fulfillment");

const admin = require("firebase-admin");
admin.initializeApp(functions.config().firebase);

process.env.DEBUG = "dialogflow:debug";

exports.dialogflowFirebaseFulfillment = functions.https.onRequest((request, response) => {
    const agent = new WebhookClient({ request, response });
    console.log("Dialogflow Request headers: " + JSON.stringify(request.headers));
    console.log("Dialogflow Request body: " + JSON.stringify(request.body));

    function welcome(agent) {
      agent.add(`Welcome to my agent!`);
    }

    function fallback(agent) {
      agent.add(`I didn't understand`);
      agent.add(`I'm sorry, can you try again?`);
    }

    function bodyMassIndex(agent) {
      let weight = request.body.queryResult.parameters.weight;
      let height = request.body.queryResult.parameters.height / 100;
      let bmi = (weight / (height * height)).toFixed(2);

      let result = "none";
      let pkgId = "1";
      let stkId = "1";

      if (bmi < 18.5) {
        pkgId = "11538";
        stkId = "51626519";
        result = "xs";
      } else if (bmi >= 18.5 && bmi <= 22.9) {
        pkgId = "11537";
        stkId = "52002741";
        result = "s";
      } else if (bmi >= 23 && bmi <= 24.9) {
        pkgId = "11537";
        stkId = "52002745";
        result = "m";
      } else if (bmi >= 25 && bmi <= 29.9) {
        pkgId = "11537";
        stkId = "52002762";
        result = "l";
      } else if (bmi > 30) {
        pkgId = "11538";
        stkId = "51626513";
        result = "xl";
      }
      const payloadJson = {
        type: "sticker",
        packageId: pkgId,
        stickerId: stkId
      };

      let payload = new Payload(`LINE`, payloadJson, { sendAsMessage: true });

      return admin.firestore().collection("bmi").doc(result).get().then(doc => {
        agent.add(payload);
        agent.add(doc.data().description);
      });
    }

    let intentMap = new Map();
    intentMap.set("Default Welcome Intent", welcome);
    intentMap.set("Default Fallback Intent", fallback);
    intentMap.set("BMI - custom - yes", bodyMassIndex);

    agent.handleRequest(intentMap);
  }
);
