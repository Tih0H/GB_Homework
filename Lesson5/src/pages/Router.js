import { Routes, Route, Link} from "react-router-dom";
import Home from "./Home";
import Profile from "./Profile";
import Chats from "./Chats";
import React, { useState } from 'react';
import {AUTHOR}  from '../constants/common'

const initialChat = ([
  { id: 101, name: "Чат 101", messages: [{text: "Massege of chat 101", author: AUTHOR.me}] },
  { id: 202, name: "Чат 202", messages: [{text: "Massege of chat 202", author: AUTHOR.bot}] },
  { id: 303, name: "Чат 303", messages: [{text: "Massege of chat 303", author: AUTHOR.me}] },
  { id: 404, name: "Чат 404", messages: [{text: "Massege of chat 404", author: AUTHOR.bot}] },
  { id: 505, name: "Чат 505", messages: [{text: "Massege of chat 505", author: AUTHOR.me}] },
  { id: 606, name: "Чат 606", messages: [{text: "Massege of chat 606", author: AUTHOR.bot}] },
]);

const Router = () =>{
  const [chats, setChats] = useState(initialChat);
  const addMassage = (chatId, message) => {
    setChats({...chats, [chatId]: {
      name: chats[chatId].name,
      messages: [...chats[chatId].messages, message]
    }})
  };
  return <>
    <ul>
      <li>
        <Link to="/">Home</Link>
      </li>
      <li>
        <Link to='/profile'>Profile</Link>
      </li>
      <li>
        <Link to='/chats'>Chats</Link>
      </li>
    </ul>
    <Routes>
    <Route path="/" exact element={<Home />} />
    <Route path="/profile"  element={<Profile />} />
    <Route path="/chats/:chatsId"  element={<Chats chats={chats} addMassage={addMassage}/>} />
    <Route path="*"  element={<Chats chats={chats}/>}/>
    </Routes>
  </>
};

export default Router;