import { useParams } from 'react-router-dom';

const MessageList = ({chats}) =>{
  let { chatsId } = useParams();
  if (!chats[chatsId]) return null;
  const messages = chats[chatsId].messages;
  return <div>
    {messages.map((element, index) => (
      <div key={index}>
        <p>{element.text}</p>
        <p>{element.author}</p>
      </div>
    ))}
  </div>
};

export default MessageList;