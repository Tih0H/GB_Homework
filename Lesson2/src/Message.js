
import './App.css';

function Message(props) {
  return (
    <div className="Message">
      <header className="Message-header">
        <h3> {props.name}</h3>
      </header>
    </div>
  );
}

export default Message;
