import React from 'react';
import { View, Text } from 'react-native';

const Goal = () => {
return (
  <View style={{alignItems: 'center'}}>
    <Text style={styles.textStyle}> 35/100 </Text>
    <Text style={styles.hoursStyle}>hours</Text>
  </View>
  );
};

const styles = {
  textStyle: {
    shadowColor: '#808080',
    shadowRadius: 50,
    shadowOpacity: 0.4,
    shadowOffset: { width: 0, height: 2 },
    fontSize: 60,
    color: '#76CB89',
    fontWeight: 'bold'
  },
  hoursStyle: {
    fontSize: 14,
    color: '#76CB89'
  }
};

export default Goal;
