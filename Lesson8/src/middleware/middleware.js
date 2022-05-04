import { ADD_MESSAGE, addMessage } from "../store/messages/actions";
import {AUTHOR}  from '../constants/common';

const middleware = store => next => action => {
  console.log('we in middleware');
  if(action.type === ADD_MESSAGE && action.payload.message.author !== AUTHOR.bot){
    const newMassege = {text: 'text from bota, from middleware', author: AUTHOR.bot}
    setTimeout(() => store.dispatch(addMessage(action.payload.chatId, newMassege)), 1500);    
  };
  return next(action);
};

export default middleware;