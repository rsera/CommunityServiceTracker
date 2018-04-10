import React from 'react';
import { View, Text } from 'react-native';
import ProgressBarClassic from 'react-native-progress-bar-classic';


const GoalBar = (props) => {
  const { viewStyle, textStyle } = styles;

  return  (
    <ProgressBarClassic
    progress={20}
    valueStyle={'default'}
    height={200}
  />  
  );
};

const styles = {
  viewStyle: {
    backgroundColor: '#76CB89',
    justifyContent: 'center',
    alignItems: 'center',
    height: 70,
    elevation: 2,
    position: 'relative',
    flexDirection: 'row',
    marginBottom: 10
  },
  textStyle: {
    color: '#FFFFFF',
    fontSize: 30,
    // justifyContent: 'center',
    alignItems: 'center',
    position: 'absolute',
    fontFamily: 'sansation'
  }
};

export default GoalBar;