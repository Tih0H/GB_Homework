import { ADD_MESSAGE, UPDATE_MESSAGES } from "./actions";

const initialState = {
  messageList: {}
};

const messageReducer = (state = initialState, action) =>{
  switch (action.type) {
    case ADD_MESSAGE: {
      const { chatId, message } = action.payload;
      const oldMessages = state.messageList[chatId] || [];
      
      return {
        ...state,
        messageList: {
          ...state.messageList,
          [chatId]: [
            ...oldMessages,
            {
              ...message,
              id: `${chatId}${oldMessages.length}`
            }
          ]
        }
      };
    }
    case UPDATE_MESSAGES:
      return {
        ...state,
        messageList: {
          ...state.messageList,
          [action.chatId]: action.messages
        }
      }
    default:
      return state;
  }
};

export default messageReducer;