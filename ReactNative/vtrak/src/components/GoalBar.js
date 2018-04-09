import React from 'react';
import { View, Text } from 'react-native';
// import ProgressBar from 'react-native-progress';

const GoalBar = (props) => {
  const { viewStyle, textStyle } = styles;

  return  (
    <View style={viewStyle}>
      <Text style={textStyle}>{props.goalBarText}</Text>
      {/* <ProgressBar
        completePercentage={30}
        color={ '#4FB948' }
        borderColor={ '#007696' } /> */}
    </View>
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