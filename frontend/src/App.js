import './App.css';
import React from 'react';
import bg_image from './images/bg.jpg'

function App() {
  return (
    <div className='bg-image'>
      <div className='text'>
        <ul>
          <h6>Welcome to Login page</h6><br />
          <h6>Enter email</h6><br />
          <h6>Enter password</h6><br />
          <h6>Forgot password</h6>
        </ul>
      </div>
      <img src={bg_image} width={1600} height={770}></img>
    </div>
  );
}
export default App;
