import { Routes, Route, Link} from "react-router-dom";
import Home from "./Home";
import Profile from "./Profile";
import Chats from "./Chats";
import React from 'react';
import Gists from "./Gists";

const Router = () =>{
  
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
      <li>
        <Link to='/gists'>Gists</Link>
      </li>
    </ul>
    <Routes>
      <Route path="/" exact element={<Home />} />
      <Route path="/profile"  element={<Profile />} />
      <Route path="/gists"  element={<Gists />} />
      <Route path="/chats/:chatsId"  element={<Chats />} />
      <Route path="*"  element={<Chats />}/>
    </Routes>
  </>
};

export default Router;