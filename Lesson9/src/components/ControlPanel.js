import React, { useEffect, useRef, useState } from 'react';
import { TextField } from '@mui/material';
import Fab from '@mui/material/Fab';
import SendIcon from '@mui/icons-material/Send';
import { useParams } from 'react-router-dom';
import { useDispatch, useSelector } from 'react-redux'; 
import { addMessageWithFB } from '../middleware/middleware';

const ControlPanel = () =>{
  let { chatId } = useParams();
  const focusInputField = useRef();
  const [value, setValue] = useState('');
  const inputRef = useRef(null);
  const dispatch = useDispatch();
  const author = useSelector(state => state.profile.name)
  
  const hendeleInput = (event) => {
    setValue(event.target.value)
  }
  const handleClick = (e) =>{
    e.preventDefault();
    if (value !== ''){
      const newMessage = {text: value, author: author}
      dispatch(addMessageWithFB(chatId, newMessage));
      setValue('');
      inputRef.current?.focus();
    }
  }
  useEffect(() => {
    inputRef.current?.focus();
  });

  return <div>
     <TextField
        autoFocus
        focused
        inputRef={focusInputField}
        value={value}
        placeholder={'введите сообщение'} 
        onChange={hendeleInput} 
      />
      <Fab onClick={handleClick}
      color="primary" 
      aria-label="add">
        <SendIcon />
      </Fab>
  </div>
};

export default ControlPanel;