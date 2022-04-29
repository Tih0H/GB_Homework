import PropTypes from "prop-types";

const Messages = (props) =>{

    const {messages} = props;
  return <>
    {messages.map((element, index) => (
      <div key={index}>
        <p>{element.text}</p>
        <p>{element.author}</p>
      </div>
    ))}
  </>
}

export default Messages

Messages.propTypes = {
  messages: PropTypes.arrayOf(PropTypes.shape({
    text: PropTypes.string,
    author: PropTypes.string
  }))
};