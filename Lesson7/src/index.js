import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import Message from './Message';
import { ThemeProvider, createTheme, CircularProgress } from '@mui/material';
import {BrowserRouter} from "react-router-dom";
import { Provider } from 'react-redux';
import persistor, { store } from './store';
// import { PersistGate } from 'redux-persist/integration/react';
import { PersistGate } from 'redux-persist/es/integration/react'
const myName = 'Vladimir';
const myTxt = 'My test text)';
const myMessage = 'My text from Message';

const theme = createTheme({
  palette:{
    mode: 'dark'
  },
  status: {
    danger: '#ED6C02',
  },
});

ReactDOM.render(
  <React.StrictMode>
    <Provider store={store}>
      <PersistGate persistor={persistor} loading={<CircularProgress />}>
        <ThemeProvider theme={theme}>
          <BrowserRouter>
            <App name={myName} mytxt={myTxt}/>
            <Message name={myMessage}/>
          </BrowserRouter>
        </ThemeProvider>
      </PersistGate>
    </Provider>
  </React.StrictMode>,
  document.getElementById('root')
);

