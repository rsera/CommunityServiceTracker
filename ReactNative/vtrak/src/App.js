import React, { Component } from 'react';
import { View } from 'react-native';
import Header from './components/header';
import VolunteerEventList from './components/VolunteerEventList';

class App extends Component {
  render() {
    return (
      <View>
        <Header headerText={'vtrak'} />
        <VolunteerEventList />
    </View>
    );
  }
}

export default App;