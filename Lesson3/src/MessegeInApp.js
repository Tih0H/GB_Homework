
import './App.css';

function MessageInApp(props) {
  return (
    <div className="MessageInApp">
      <header className="MessageInApp-header">
        <h1> {props.name}</h1>
      </header>
    </div>
  );
}

export default MessageInApp;
