// import React, { useState } from "react";
// import Box from "@mui/material/Box";
// import List from "@mui/material/List";
// import ListItem from "@mui/material/ListItem";
// import ListItemButton from "@mui/material/ListItemButton";
// import ListItemText from "@mui/material/ListItemText";
// import Avatar from "@mui/material/Avatar";
// import ListItemAvatar from "@mui/material/ListItemAvatar";
// import ListSubheader from "@mui/material/ListSubheader";

// const ListChats = () => {
//   const [chat, setChat] = useState([
//     { id: 101, name: "Чат 101" },
//     { id: 202, name: "Чат 202" },
//     { id: 303, name: "Чат 303" },
//     { id: 404, name: "Чат 404" },
//     { id: 505, name: "Чат 505" },
//     { id: 606, name: "Чат 606" },
//   ]);

//   return (
//     <Box sx={{ width: "100%", maxWidth: 360, bgcolor: "background.paper" }}>
//       <nav aria-label="secondary mailbox folders">
//         <List
//           subheader={<ListSubheader>Наши чаты:</ListSubheader>}
//         >
//           {chat.map((item) => (
//             <ListItem key={item.id} disablePadding>
//               <ListItemButton>
//                 <ListItemAvatar>
//                   <Avatar
//                     alt={`${item.name}`}
//                     src={`/static/images/avatar/${item.id}.jpg`}
//                   />
//                 </ListItemAvatar>
//                 <ListItemText primary={item.name} />
//               </ListItemButton>
//             </ListItem>
//           ))}
//         </List>
//       </nav>
//     </Box>
//   );
// };

// export default ListChats;

// //-------------версия 2

// // import React, { useState } from "react";
// // import { useParams } from 'react-router-dom';
// import Typography from '@mui/material/Typography';
// import List from "@mui/material/List";
// import ListItem from "@mui/material/ListItem";
// import DeleteIcon from '@mui/icons-material/Delete';
// import ListItemText from "@mui/material/ListItemText";
// import Avatar from "@mui/material/Avatar";
// import ListItemAvatar from "@mui/material/ListItemAvatar";
// import IconButton from '@mui/material/IconButton';


// const ListChats = ({ chats }) => {
//   return <div>
//     <Typography sx={{ mt: 4, mb: 2 }} variant="h6" component="div">
//       Chat lost
//     </Typography>
//     <List>
//       {Object.keys(chats).map((chat, index) => (
//           <ListItem
//             key = {index}
//             secondaryAction={
//               <IconButton edge="end" aria-label="delete">
//                 <DeleteIcon />
//               </IconButton>
//             }
//           >
//             <ListItemAvatar>
//               <Avatar>
//                 {/* <FolderIcon /> */}
//               </Avatar>
//             </ListItemAvatar>
//             <ListItemText
//               primary={chat.name}
//             />
//           </ListItem>
//       ))}
//     </List>
//   </div>
// };

// export default ListChats;