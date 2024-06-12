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


const ListChats = ({ props }) => {
  return <div>
    <Typography sx={{ mt: 4, mb: 2 }} variant="h6" component="div">
      Chat lost
    </Typography>
    <List>
      {Object.keys(props).map((chat, index) => (
        <Link to={`/chats/${chat}`} key={index}>
          <ListItem
            key = {index}
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
              primary={props[chat].name}
            />
          </ListItem>
        </Link>  
      ))}
    </List>
  </div>
};

export default ListChats;