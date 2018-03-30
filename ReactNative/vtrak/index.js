import React from 'react';
import { AppRegistry, View } from 'react-native';
import Header from './src/components/header';
import VolunteerEventList from './src/components/VolunteerEventList';

const App = () => (
  <View>
    <Header headerText={'vtrak'} />
    <VolunteerEventList />
  </View>
);

AppRegistry.registerComponent('vtrak', () => App);