import { createStore, combineReducers, applyMiddleware, compose } from "redux";
import {persistStore, persistReducer} from 'redux-persist';
import storage from 'redux-persist/lib/storage';
import thunk from 'redux-thunk';
import chatsReducer from "./chats/reducer";
import gistsReduser from "./gists/reduser";
import messageReducer from "./messages/reducer";
import profileReducer from './profile/reduser';

const composeEnhancer = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
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
  composeEnhancer(applyMiddleware(thunk))
);
const persistor = persistStore(store);
export default persistor;