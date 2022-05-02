import { createStore, combineReducers } from "redux";
import chatsReducer from "./chats/reducer";
import messageReducer from "./messages/reducer";
import profileReducer from './profile/reduser';

const reducers = combineReducers({
  profile: profileReducer,
  chats: chatsReducer,
  messages: messageReducer
});

const store = createStore(reducers, window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__());

export default store;