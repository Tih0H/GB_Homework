import React, { useEffect, useRef, useState } from 'react';
import { TextField } from '@mui/material';
import Fab from '@mui/material/Fab';
import SendIcon from '@mui/icons-material/Send';
import {AUTHOR}  from '../constants/common'
import { useParams } from 'react-router-dom';

const ControlPanel = ({addMassage}) =>{
  let { chatsId } = useParams();
  const focusInputField = useRef();
  // const [massegeList, setMassegeList] = useState([]);
  const [value, setValue] = useState('');
  const hendeleInput = (event) => {
    setValue(event.target.value)
  }
  const handleClick = () =>{
    if (value !== ''){
      const newMassege = {text: value, author: AUTHOR.me}
      // setMassegeList([...massegeList, newMassege]);
      addMassage(chatsId, newMassege);
      setValue('');
    }
  }

  // useEffect(() => {
  //   if (massegeList.length > 0 
  //     && massegeList[massegeList.length - 1].author !== AUTHOR.bot){
  //       setTimeout(() => {
  //         const newMassege = {text: 'текст от бота', author: AUTHOR.bot}
  //       setMassegeList([...massegeList, newMassege]);
  //       }, 1500);
  //     }
  //   focusInputField.current.focus();
  // }, [massegeList])

  return <div>
     <TextField
        autoFocus
        focused
        inputRef={focusInputField}
        value={value}
        placeholder={'введите сообщение'} 
        onChange={hendeleInput} />
        <Fab onClick={handleClick} color="primary" aria-label="add">
          <SendIcon />
        </Fab>
  </div>
};

export default ControlPanel;