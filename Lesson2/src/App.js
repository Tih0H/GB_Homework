import './App.css';
import React, { useEffect, useState } from 'react';
// import Massege from './Message';
import {AUTHOR} from './constants/common'

function App() {
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
  }, [massegeList])

  return (
    <div className={"App"}>
      <header className="App-header">
        <p>мой текст</p>
        {/* {massegeList.map(element => (<Massege text={element}/>))}; */}
        {massegeList.map(element => (
          <div>
            <p>{element.text}</p>
            <p>{element.author}</p>
          </div>
        ))}
        <div>
          <input className="App-input"
          value={value}
          placeholder={'введите сообщение'} 
          onChange={hendeleInput} />
          <button className="App-btn" onClick={handleClick}>Сообщить</button>
        </div>

      </header>
    </div>
  );
}

export default App;
