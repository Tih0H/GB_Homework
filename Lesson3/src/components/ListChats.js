import React, { useState } from "react";
import Box from "@mui/material/Box";
import List from "@mui/material/List";
import ListItem from "@mui/material/ListItem";
import ListItemButton from "@mui/material/ListItemButton";
import ListItemText from "@mui/material/ListItemText";
import Avatar from "@mui/material/Avatar";
import ListItemAvatar from "@mui/material/ListItemAvatar";
import ListSubheader from "@mui/material/ListSubheader";

const ListChats = () => {
  const [chat, setChat] = useState([
    { id: 101, name: "Чат 101" },
    { id: 202, name: "Чат 202" },
    { id: 303, name: "Чат 303" },
    { id: 404, name: "Чат 404" },
    { id: 505, name: "Чат 505" },
    { id: 606, name: "Чат 606" },
  ]);

  return (
    <Box sx={{ width: "100%", maxWidth: 360, bgcolor: "background.paper" }}>
      <nav aria-label="secondary mailbox folders">
        <List
          subheader={<ListSubheader>Наши чаты:</ListSubheader>}
        >
          {chat.map((item) => (
            <ListItem key={item.id} disablePadding>
              <ListItemButton>
                <ListItemAvatar>
                  <Avatar
                    alt={`${item.name}`}
                    src={`/static/images/avatar/${item.id}.jpg`}
                  />
                </ListItemAvatar>
                <ListItemText primary={item.name} />
              </ListItemButton>
            </ListItem>
          ))}
        </List>
      </nav>
    </Box>
  );
};

export default ListChats;