import { AUTHOR } from "../../constants/common";

export const ADD_MESSAGE = 'MESSAGES::ADD_MESSAGE';
export const ADD_MESSAGE_WITH_SAGA = 'MESSAGES::ADD_MESSAGE_WITH_SAGA';

export const addMessage = (chatId, message) => ({
  type: ADD_MESSAGE,
  payload:{chatId, message}
});

export const addMessageWithSaga = (chatId, message) => ({
  type: ADD_MESSAGE_WITH_SAGA,
  payload:{chatId, message}
});

export const addMessageWithThunk = (chatId, message) => (dispatch, getState) => {
  dispatch(addMessage(chatId, message));

  if(message.author !== AUTHOR.bot){
    const botMassege = {text: 'text from bota, from thunk', author: AUTHOR.bot};
    setTimeout(() => dispatch(addMessage(chatId, botMassege)), 1500);
  }
};