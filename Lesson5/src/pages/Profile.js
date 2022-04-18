import { useCallback, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
// import store from '../store';
import {changeVisible} from '../store/profile/actions';

const Profile = () =>{
  const {showName, name} = useSelector((state) => state);
  const dispatch = useDispatch();
  // const [, setDummy] = useState(false);
  
  const setShowName = useCallback( ()=>{
    dispatch(changeVisible);
  }, [dispatch]);
  return <div>
  <h1>Профиль</h1>
  <input
    type="checkbox"
    checked={showName}
    value={showName}
    onChange={setShowName}
  />
  <span>Показать имя</span>
  {showName && <h3>{name}</h3>}
  </div>
};

export default Profile;