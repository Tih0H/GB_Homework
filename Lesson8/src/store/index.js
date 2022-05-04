import { createStore, combineReducers, applyMiddleware, compose } from "redux";
// import middleware from "../middleware/middleware";
import {persistStore, persistReducer} from 'redux-persist';
import storage from 'redux-persist/lib/storage';
import thunk from 'redux-thunk';

import chatsReducer from "./chats/reducer";
import gistsReduser from "./gists/reduser";
import messageReducer from "./messages/reducer";
import profileReducer from './profile/reduser';
// import createSagaMiddleware  from 'redux-saga';
// import mySaga from "./sagas";
const composeEnhancer = window.__REDUX_DEVTOOLS_EXTENSION__COMPOSE__ || compose;
// const sagaMiddleware = createSagaMiddleware();
const persistConfig = {
  key: 'root',
  storage
};
const reducers = combineReducers({
  profile: profileReducer,
  chats: chatsReducer,
  messages: messageReducer,
  gists: gistsReduser
});
const persistedReduser = persistReducer(persistConfig, reducers);
export const store = createStore(
  persistedReduser,
  // composeEnhancer(applyMiddleware(middleware))
  // composeEnhancer(applyMiddleware(thunk))
  // applyMiddleware(sagaMiddleware)
  composeEnhancer(applyMiddleware(thunk))
);
const persistor = persistStore(store);
// sagaMiddleware.run(mySaga);
export default persistor;