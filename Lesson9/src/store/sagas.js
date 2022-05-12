import { delay, put, takeEvery } from 'redux-saga/effects';
import { AUTHOR } from '../constants/common';
import { ADD_MESSAGE_WITH_SAGA, addMessage } from './messages/actions';


function* onAddMessageWithSaga(action){
  yield put(addMessage(action.payload.chatId, action.payload.message));
  if (action.payload.message.author !== AUTHOR.bot){
    const botMessage = {text: 'text from bota, from sagas', author: AUTHOR.bot};
    yield delay(2000);
    yield put(addMessage(action.payload.chatId, botMessage))
  }
};

function* mySaga(){
  yield takeEvery(ADD_MESSAGE_WITH_SAGA, onAddMessageWithSaga)
};
export default mySaga;