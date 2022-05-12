import { Button, TextField } from "@mui/material";
import { useState } from "react";
import { useLocation, useNavigate } from "react-router";
import useAuth from "../hooks/AuthProvider";
import { ToastContainer, toast } from 'react-toastify';

const Login = () =>{
  let navigate = useNavigate();
  let location = useLocation();
  const auth = useAuth();

  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  let from = location.state?.from?.pathname || '/';
  const handleEmail = (e) =>{
    setEmail(e.target.value);
  };
  const handlePassword = (e) =>{
    setPassword(e.target.value);
  };
  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');
    try {
      await auth.signin({email, password}, () => {
        setTimeout(() => navigate(from, {replace: true}), 1500);
      });
    } catch (e) {
      toast.error('Errore tost');
      setError(e);
      console.error(e);
    }
  };

  return (<div>
    <ToastContainer />
    <form onSubmit={handleSubmit}>
      <h1>Login</h1>
      <p>Enter your email and password to login</p>
      <div>
        <TextField 
        placeholder="Enter Email"
        name="email"
        type="email"
        value={email}
        onChange={handleEmail}
        required
        />
      </div>
      <div>
        <TextField 
        placeholder="Enter Password"
        name="password"
        type="password"
        value={password}
        onChange={handlePassword}
        required
        />
      </div>
      <br/>
      <br/>
      {error && <p>{error}</p>}
      <Button variant="outlined" type="submit">Come in</Button>
    </form>
  </div>)
};
export default Login;