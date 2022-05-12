import { Button, TextField } from "@mui/material";
import { getAuth , createUserWithEmailAndPassword } from "firebase/auth";
import { useState } from "react";
import { Link } from "react-router-dom";
import firebaseConfig from '../services/firebaseConfig';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

const Registration = () =>{
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error] = useState('');

const handleEmailChange = (e) => {
  setEmail(e.target.value);
};

const handlePasswordChange = (e) =>{
  setPassword(e.target.value);
};

const onSubmit = async (e) => {
  e.preventDefault();
  try {
    const auth = getAuth(firebaseConfig);
    await createUserWithEmailAndPassword(auth, email, password);
    toast.success('registered');
    setEmail('');
    setPassword('');
  } catch (e) {
    toast.error('error toast');
    console.error(e);
  }
};

  return (
  <div>
      <ToastContainer />
    <form onSubmit={onSubmit}>
      <h2>Registration</h2>
      <TextField 
        placeholder="Enter email"
        name="email"
        type="email"
        onChange={handleEmailChange}
        value={email}
        required
      />
      <br />
      <br />
      <TextField 
        placeholder="Enter password"
        name="password"
        type="password"
        onChange={handlePasswordChange}
        value={password}
        required
      />
      <br />
      <div>
        {error && <p>{error}</p>}
        <Button type="submit">Register</Button>
      </div>
      <p>
        Do you have an account? <Link to="/login">Come in</Link>
      </p>
    </form>
  </div>
  )
};
export default Registration;