import { ADD_CHAT } from "./actions";

const initialState = {
  chatList: []
};

// const chatList = [
//   { 
//     id: '101',
//     name: "Чат 101",
//     messages: [
//       {text: "Message of Me", author: AUTHOR.me},
//       {text: "Message of Bot", author: AUTHOR.bot}
//     ]
//   }];

const chatsReducer = (state = initialState, action) => {
  switch (action.type) {
    case ADD_CHAT:
      return {
        ...state,
        chatList: [
          ...state.chatList,
          {
            id: `id${state.chatList.length}`,
            name: action.payload
          }
        ]
      };
    default:
      return state;
  }
};

export default chatsReducer;