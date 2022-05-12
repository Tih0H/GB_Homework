import { initializeApp } from "firebase/app";

const firebaseConfig = {
  apiKey: "AIzaSyC5AR-SfiA_sE6pya4Bmx-KtdI2d2KnR6Q",
  authDomain: "testchatapp-e8595.firebaseapp.com",
  databaseURL: "https://testchatapp-e8595-default-rtdb.firebaseio.com",
  projectId: "testchatapp-e8595",
  storageBucket: "testchatapp-e8595.appspot.com",
  messagingSenderId: "901570382650",
  appId: "1:901570382650:web:f6c191165e73ef382e1e03"
};

const firebase = initializeApp(firebaseConfig);

export default firebase;
