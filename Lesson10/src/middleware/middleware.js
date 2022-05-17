import { ADD_MESSAGE, addMessage, updateMessages } from "../store/messages/actions";
import {AUTHOR}  from '../constants/common';
import {getDatabase, ref, onValue, push, set, remove} from 'firebase/database';
import  firebaseConfig  from '../services/firebaseConfig';
import { chatListUpdate } from "../store/chats/actions";

const middleware = store => next => action => {
  console.log('we in middleware');
  if(action.type === ADD_MESSAGE && action.payload.message.author !== AUTHOR.bot){
    const newMassege = {text: 'text from bota, from middleware', author: AUTHOR.bot}
    setTimeout(() => store.dispatch(addMessage(action.payload.chatId, newMassege)), 1500);    
  };
  return next(action);
};
export const initTrackerWithFB = () => async (dispatch) => {
  const db = getDatabase(firebaseConfig);
  const chatRef = ref(db, '/chats');
  onValue(chatRef, (snapshot)=>{
    const data = snapshot.val();
    const chatIds = Object.keys(data);
    const chatArr = chatIds.map((item)=>({
      id:item,
      name: data[item].name
    }));
    dispatch(chatListUpdate(chatArr));
  });
};
export const addChatWithFB = (name) => async () =>{
  const db = getDatabase(firebaseConfig);
  const chatRef = ref(db, '/chats');
  const newChatRef = push(chatRef);
  set(newChatRef, {name: name}).then((res) =>{
    console.log('chat added', res);
  });
}
export const deleteChatWithFB = (id) => async () =>{
  const db = getDatabase(firebaseConfig);
  const chatRef = ref(db, `/chats/${id}`);
  const messagesRef = ref(db, `/messages/${id}`);
  remove(chatRef).then((res) =>{
    console.log('Chat Removed', res);
  });
  remove(messagesRef).then((res) => {
    console.log('Messages deleted', res);
  });
};
export const addMessageWithFB = (chatId, message) => async () => {
  const db = getDatabase(firebaseConfig);
  const messageRef = ref(db, `/messages/${chatId}`);
  const newMassegeRef= push(messageRef);
  set(newMassegeRef, message).then((res) =>{
    console.log('messages added', res);
  });
};
export const getMessagesByChatIdWithFB = (chatId) => async (dispatch) =>{
  const db = getDatabase(firebaseConfig);
  const msgRef = ref(db, `/messages/${chatId}`);
  onValue(msgRef, (snapshot) => {
    const data = snapshot.val();
    const msg = data && Object.values(data);
    if (msg?.length > 0){
      dispatch(updateMessages(chatId, msg));
    }
  });
};
export default middleware;