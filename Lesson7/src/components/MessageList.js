import { useParams } from 'react-router-dom';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import Divider from '@mui/material/Divider';
import ListItemText from '@mui/material/ListItemText';
import ListItemAvatar from '@mui/material/ListItemAvatar';
import Avatar from '@mui/material/Avatar';
import Typography from '@mui/material/Typography';
import AccountCircleIcon from '@mui/icons-material/AccountCircle';
import AndroidIcon from '@mui/icons-material/Android';
import {AUTHOR}  from '../constants/common';
import { useSelector } from 'react-redux';

const MessageList = () =>{
  
  const allMessages = useSelector(state => state.messages.messageList);
  let { chatsId } = useParams();
  const { name } = useSelector((state) => state.profile);
  if (!allMessages[chatsId]) return null;
  const messages = allMessages[chatsId];

  const isAuthorBot = (author) =>{
    return author === AUTHOR.bot;
  };
  return (
    <>
    <List sx={{ width: '100%', maxWidth: 360, bgcolor: 'background.paper' }}>
      {messages.map((element) => (
        <div key={element.id}>
          <ListItem alignItems="flex-start">
          <ListItemAvatar>
            <Avatar alt="Remy Sharp">
              {isAuthorBot(element.author) ? <AndroidIcon/> : <AccountCircleIcon/>}
            </Avatar>
          </ListItemAvatar>
          <ListItemText
            primary={isAuthorBot(element.author)? AUTHOR.bot : name}
            secondary={
              <>
                <Typography
                  sx={{ display: 'inline' }}
                  component="span"
                  variant="body2"
                  color="text.primary"
                >
                  {element.text}
                </Typography>
              </>
            }
          />
        </ListItem>
          <Divider variant="inset" component="li" />
        </div>
      ))}
    </List>
    </>
  )
};

export default MessageList;