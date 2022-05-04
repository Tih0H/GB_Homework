import { CircularProgress } from "@mui/material";
import { useCallback, useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
// import { API_URL_PUBLIC } from "../constants/gists";
import { getAllGists } from "../store/gists/actions";
import { selectGists, selectGistsError, selectGistsLoading } from "../store/gists/selectors";

const Gists = () =>{
  // const [gists, setGists] = useState([]);
  // const [error, setError] = useState(false);
  // const [isLoading, setIsLoading] = useState(false);
  const dispatch = useDispatch();
  const gists = useSelector(selectGists);
  const loading = useSelector(selectGistsLoading);
  const error = useSelector(selectGistsError);

  const requestGists = useCallback(async() => {
    // setIsLoading(true);
    // try {
    //   const response = await fetch(API_URL_PUBLIC);
    //   if(!response.ok){
    //     throw new Error(`Reqest failed: ${response.status}`);
    //   }
    //   const result = await response.json();
    //   setGists(result);
    // } catch (e) {
    //   console.error(e);
    //   setError(true);
    // } finally {
    //   setIsLoading(false);
    // }
    dispatch(getAllGists());
  }, []);

  useEffect(() => {
    requestGists();
  }, []);

  const renderGist = useCallback(
    (gist) => <li key={gist.id}>{gist.description || 'No description'}</li>,
    []
  );
  if(loading){
    console.log('loading: ', loading);
    return <CircularProgress />;
  };
  if (error){
    return (
      <>
        <h3>Error</h3>
        <button onClick={requestGists}>Retry reqest</button>
      </>
    )
  };
  console.log('gists: ', gists);
  return (
    <ul>
      {gists.map(renderGist)}
    </ul>
  );
};

export default Gists;