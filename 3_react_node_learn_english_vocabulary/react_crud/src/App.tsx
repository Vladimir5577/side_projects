import { useState, useEffect } from 'react';
import axios from 'axios';
import './App.css';
const server_url = process.env.REACT_APP_SERVER_DATABASE_URL;

const App: React.FC = () => {

  const [image, setImage] = useState<string | null | undefined | any>('');
  const [description, setDescription] = useState<string | null | undefined | any>('');
  const [cardsData, setCardsData] = useState([]);
  const [bigImage, setBigImage] = useState(false);

  const inputFile = (e: any) => {
    setImage(e.target.files[0]);
  };

  const submitHandler = (): void => {
    const formData = new FormData();
    formData.append('image', image);
    formData.append('description', description);
    axios.post(server_url + '/add_card', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    }).then(response => {
      console.log(response.data);
    });
  };

  useEffect(() => {
    const fetchData = async () => {
      const result = await axios(server_url + '/get_cards');
      setCardsData(result.data);
      // console.log(result.data);
    };
    fetchData();
  }, []);

  const imageView = () => {
    console.log(123123);
    
  }; 

  const deleteCard = async (id: string) => {
    console.log(id);
    const card = await axios(server_url + '/delete/' + id);
    console.log(card.data);
  };


  return (
    <div className="App">
      <h1>Learn English vocabulary</h1>
      <br />
      <label>Name</label>
      <input type="file" onChange={ inputFile } />
      <br />
      <label>Country</label>
      <input type="text" onChange={ e => setDescription(e.target.value) } />
      <br />
      <button onClick={submitHandler}>Submit</button>

      <table>
        <thead>
          <tr>
            <td>#</td>
            <td>Image</td>
            <td>Description</td>
            <td>Action</td>

          </tr>
        </thead>
        <tbody>
            {
              cardsData.map((card: any) => {
                let image_path = 'http://localhost:3001/uploads/' + card.image;
                return (
                  <tr key={ card._id } >
                    <td>#</td>
                    <td >
                      <img className="image_preview" onClick={imageView} src={image_path} alt="image1" />
                    </td>
                    <td>{ card.description }</td>
                    <td><button onClick={ () => deleteCard(card._id) }>Delete</button></td>
                  </tr>
                );
              })
            }    
        </tbody>
      </table>

      
    </div>
  );
};

export default App;
