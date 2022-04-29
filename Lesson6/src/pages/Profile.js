import { TextField } from '@mui/material';
import { useCallback, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import {changeVisible, updateName} from '../store/profile/actions';

const Profile = () =>{
  const {showName, name} = useSelector((state) => state.profile);
  const dispatch = useDispatch();
  const [value, setValue] = useState(name);
  // const [, setDummy] = useState(false);
  const setShowName = useCallback( ()=>{
    dispatch(changeVisible);
  }, [dispatch]);

  const hendeleInput = (event) => {
    setValue(event.target.value);
  };
  const saveName = () => {
    dispatch(updateName(value));
  };

  return <div>
    <h1>Профиль</h1>
    <input
      type="checkbox"
      checked={showName}
      value={showName}
      onChange={setShowName}
    />
    <span>Показать имя</span>
    {/* <button onClick={setShowName}>Показать имя</button> */}
    <blockquote>{showName && <h3>{name}</h3>}</blockquote>
    
    <TextField
      name="name"
      label="name"
      placeholder="Введите ваше имя" 
      // value={name}
      onChange={hendeleInput}
    />
    <button onClick={saveName}>Сохранить</button>
  </div>
};

export default Profile;