import { Routes, Route, Link} from "react-router-dom";
import Home from "./Home";
import Profile from "./Profile";
import Chats from "./Chats";
import React from 'react';
import Gists from "./Gists";
import Login from "./Login";
import Registration from "./Registration";
import RequireAuth from "../hocs/RequireAuth";
import SetChats from "./SetChats";

const Router = () =>{
  
  return <>
    <ul className={'menu'}>
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
      <li>
        <Link to='/login'>Login</Link>
      </li>
      <li>
        <Link to='/registration'>Registration</Link>
      </li>
    </ul>
    <Routes>
      <Route path="/" exact element={<Home />} />
      <Route path="/login"  element={<Login />} />
      <Route path="/registration"  element={<Registration />} />
      <Route element={<RequireAuth />}>
        <Route path="/profile"  element={<Profile />} />
        <Route path="/gists"  element={<Gists />} />
        <Route index path="/chats"  element={<SetChats />} />
        <Route path="/chats/:chatId"  element={<Chats />} />
      </Route>
      <Route path="*"  element={<Chats />}/>
    </Routes>
  </>
};

export default Router;