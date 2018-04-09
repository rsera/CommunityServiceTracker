// Wraps Header and Volunteer Event List into home HomeScreen

import React from 'react';
import { View } from 'react-native';
import Header from './header.js';
import VolunteerEventList from './VolunteerEventList.js';

const HomeScreen = () => {
  return (
    <View>
      <Header headerText={'vTrak'} />
      <VolunteerEventList />
    </View>
  );
}

export default HomeScreen;
