import React, { useState } from "react";
import firebaseConfig from "../services/firebaseConfig";
import { getAuth, signInWithEmailAndPassword, onAuthStateChanged, signOut } from 'firebase/auth';

let AuthContext = React.createContext(null);

export function AuthProvider ({ children }){
  const [user, setUser] = useState();

  let signin = async(newUser, callback) => {
    const auth = getAuth(firebaseConfig);
    await signInWithEmailAndPassword(auth, newUser.email, newUser.password);
    await onAuthStateChanged(auth, (user)=> {
      if(user){
        setUser(user);
      }
    });
    callback();
  };
  let singout = async (callback) => {
    const auth = getAuth(firebaseConfig);
    await signOut(auth);
    setUser(null);
    callback();
  };
  let value = {user, signin, singout};

  return <AuthContext.Provider value={value}>{children}</AuthContext.Provider>;
};

const useAuth = () => {
  return React.useContext(AuthContext);
};
export default useAuth;