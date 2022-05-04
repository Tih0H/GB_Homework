import MessageList from '../components/MessageList'
import ListChats from '../components/ListChats'
import ControlPanel from '../components/ControlPanel';

const Chats = () =>{
  return <div>
    <div className="App-header-flex"> 
      <ListChats />  
      <div className="messagerPlace">
        <MessageList />
        <ControlPanel />
      </div>    
    </div>
  </div>
};

export default Chats;