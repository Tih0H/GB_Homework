import React, { useEffect, useRef, useState } from 'react';
import { TextField } from '@mui/material';
import Fab from '@mui/material/Fab';
import SendIcon from '@mui/icons-material/Send';
import {AUTHOR}  from '../constants/common'
import { useParams } from 'react-router-dom';
import { useDispatch, useSelector } from 'react-redux';
import { addMessage } from '../store/messages/actions';

const ControlPanel = () =>{
  let { chatsId } = useParams();
  const focusInputField = useRef();
  const [value, setValue] = useState('');
  const inputRef = useRef(null);
  const dispatch = useDispatch();
  const author = useSelector(state => state.profile.name)
  const allMessages = useSelector((state) => state.messages.messageList)
  
  const messages = allMessages[chatsId] || [];
  
  const hendeleInput = (event) => {
    setValue(event.target.value)
  }
  const handleClick = (e) =>{
    e.preventDefault();
    if (value !== ''){
      const newMessage = {text: value, author}
      dispatch(addMessage(chatsId, newMessage));
      setValue('');
      inputRef.current?.focus();//было отключено
    }
  }

  useEffect(() => {
    if (messages?.length > 0 
      && messages[messages.length - 1].author !== AUTHOR.bot){
        setTimeout(() => {
          const newMassege = {text: 'text from bota', author: AUTHOR.bot}
        dispatch(addMessage(chatsId, newMassege));
        }, 1000);
      }
    focusInputField.current.focus();
  }, [messages, chatsId])

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
