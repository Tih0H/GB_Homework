import './App.css';
import React, { useEffect, useRef, useState } from 'react';
// import Massege from './Message';
import {AUTHOR} from './constants/common'
import { TextField } from '@mui/material';
import Fab from '@mui/material/Fab';
import SendIcon from '@mui/icons-material/Send';
import Messages from './components/Messages'
import InteractiveList from './components/ListChats'

function App() {
  const focusInputField = useRef();
  const [massegeList, setMassegeList] = useState([]);
  const [value, setValue] = useState('');
  console.log('massegeList: ', massegeList);

  const hendeleInput = (event) => {
    setValue(event.target.value)
  }
  const handleClick = () =>{
    if (value !== ''){
      const newMassege = {text: value, author: AUTHOR.me}
      setMassegeList([...massegeList, newMassege]);
      setValue('');
    }
  }
  
  useEffect(() => {
    if (massegeList.length > 0 
      && massegeList[massegeList.length - 1].author !== AUTHOR.bot){
        setTimeout(() => {
          const newMassege = {text: 'текст от бота', author: AUTHOR.bot}
        setMassegeList([...massegeList, newMassege]);
        }, 1500);
      }
    focusInputField.current.focus();
  }, [massegeList])

  return (
    <div className={"App"}>
      <header className="App-header">
      
        <div className="App-header-flex">
          {/* <p>мой текст</p> */}
          {/* {massegeList.map(element => (<Massege text={element}/>))}; */}
          {/* {massegeList.map((element, index) => (
            <div key={index}>
              <p>{element.text}</p>
              <p>{element.author}</p>
            </div>
          ))} */}
          <InteractiveList />
          <div>
            <Messages messages={massegeList}/>
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
            {/* <button className="App-btn" onClick={handleClick}>Сообщить</button> */}
          </div>
        </div>
      </header>
    </div>
  );
}

export default App;
