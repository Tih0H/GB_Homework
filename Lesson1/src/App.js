
import './App.css';
import MessageInApp from './MessegeInAPP.js';

const myAppMessage = 'My messege in App';

function App(props) {
  return (
    <div className="App">
      <header className="App-header">
        My First React App
        <h3>Hello {props.name}</h3>
        <p>{props.mytxt}</p>
      </header>
      
      <MessageInApp name={myAppMessage}/>
    </div>
  );
}

export default App;
