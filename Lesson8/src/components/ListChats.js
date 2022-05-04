import * as React from 'react';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemAvatar from '@mui/material/ListItemAvatar';
import ListItemText from '@mui/material/ListItemText';
import Avatar from '@mui/material/Avatar';
import IconButton from '@mui/material/IconButton';
import Typography from '@mui/material/Typography';
import DeleteIcon from '@mui/icons-material/Delete';
import { Link } from 'react-router-dom';
import { useDispatch, useSelector } from 'react-redux';
import { Button, Dialog, DialogTitle, TextField } from '@mui/material';
import {useState} from 'react';
import { addChat } from '../store/chats/actions';

const ListChats = () => {
  const chats = useSelector(state => state.chats.chatList);
  const [visible, setVisible] = useState(false);
  const [chatName, setChatName] = useState('');
  const dispatch = useDispatch();

  const handleChatName = (e) => {
    setChatName(e.target.value);
  };
  const handleAdd = () => {
    setVisible(true);
  };
  const handleClose = () => {
    setVisible(false);
  };
  const handleSave = () =>{
    dispatch(addChat(chatName));
    setChatName('');
    handleClose();
  };

  return( <div>
    <Typography sx={{ mt: 4, mb: 2 }} variant="h6" component="div">
      Chat lost
    </Typography>
    <List>
      {chats?.length > 0 ? (
        chats.map((chat) => (
          <Link to={`/chats/${chat.id}`} key={chat.id}>
            <ListItem
              secondaryAction={
                <IconButton edge="end" aria-label="delete">
                  <DeleteIcon />
                </IconButton>
              }
            >
              <ListItemAvatar>
                <Avatar>
                  {/* <FolderIcon /> */}
                </Avatar>
              </ListItemAvatar>
              <ListItemText
                primary={chat.name}
              />
            </ListItem>
          </Link>  
        ))
      ) : (
      <div>Сhat not selected</div>
      )}
    </List>
    <Button onClick={handleAdd}>Add chat</Button>
    <Dialog open={visible} onClose={handleClose}>
      <DialogTitle>Please enter a name for a new chat</DialogTitle>
      <TextField 
        placeholder='Chat name'
        value={chatName}
        onChange={handleChatName}
      />
      <Button 
      onClick={handleSave} 
      style={{color: 'white'}}
      variant="outlined"
      >Save chat</Button>
    </Dialog>
  </div>
  );
};

export default ListChats;