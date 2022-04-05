import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import Message from './Message';

const myName = 'Vladimir';
const myTxt = 'My test text)';
const myMessage = 'My text from Message';


ReactDOM.render(
  <React.StrictMode>
    <App name={myName} mytxt={myTxt}/>
    <Message name={myMessage}/>
  </React.StrictMode>,
  document.getElementById('root')
);

