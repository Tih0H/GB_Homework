import ListChats from '../components/ListChats';

const SetChats = () =>{
  return <div>
    <div className="App-header-flex"> 
      <ListChats /> 
      <div className="messagerPlace">
      <h3>Please select a chat</h3>
      </div>    
    </div>
  </div>
};

export default SetChats;