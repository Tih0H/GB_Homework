import MessageList from '../components/MessageList'
import ListChats from '../components/ListChats'
import ControlPanel from '../components/ControlPanel';
import { useParams } from 'react-router-dom';

const Chats = ({chats, addMassage}) =>{
  
  let {chatsId} = useParams(); 
  if (!chats[chatsId]) {
    return<div>
    <div className="App-header-flex"> 
      <ListChats props={chats}/>  
      <div className="massegerPlace">
        <h3>Выберите чат</h3>
      </div>    
    </div>
  </div>;
  }

  return <div>
    <div className="App-header-flex"> 
      <ListChats props={chats}/>  
      <div className="massegerPlace">
        <MessageList chats={chats}/>
        <ControlPanel addMassage={addMassage}/>
      </div>    
    </div>
  </div>
};

export default Chats;